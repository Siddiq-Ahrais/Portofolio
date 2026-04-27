import React, { useState, useEffect, useMemo } from 'react';
import { createRoot } from 'react-dom/client';

function ProjectFilter() {
    const [projects, setProjects] = useState([]);
    const [techs, setTechs] = useState([]);
    const [activeFilter, setActiveFilter] = useState('all');
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(null);

    useEffect(() => {
        fetchProjects();
    }, []);

    const fetchProjects = async () => {
        try {
            setLoading(true);
            const response = await fetch('/api/projects');
            const data = await response.json();
            setProjects(data.projects);
            setTechs(data.techs);
        } catch (err) {
            setError('Gagal memuat proyek.');
            console.error(err);
        } finally {
            setLoading(false);
        }
    };

    const filteredProjects = useMemo(() => {
        if (activeFilter === 'all') return projects;
        return projects.filter((p) =>
            p.tech_stack.includes(activeFilter)
        );
    }, [projects, activeFilter]);

    if (loading) {
        return (
            <div className="flex justify-center items-center py-20">
                <div className="animate-spin rounded-full h-10 w-10 border-b-2 border-indigo-500"></div>
            </div>
        );
    }

    if (error) {
        return (
            <div className="text-center py-20 text-red-500">
                <p>{error}</p>
                <button onClick={fetchProjects} className="mt-3 text-indigo-500 hover:underline">
                    Coba lagi
                </button>
            </div>
        );
    }

    return (
        <div>
            {/* Filter Buttons */}
            {techs.length > 0 && (
                <div className="flex flex-wrap gap-2 mb-8 justify-center">
                    <button
                        onClick={() => setActiveFilter('all')}
                        className={`px-4 py-2 rounded-full text-sm font-medium transition-all duration-200 ${
                            activeFilter === 'all'
                                ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-500/30'
                                : 'bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700'
                        }`}
                    >
                        Semua
                    </button>
                    {techs.map((tech) => (
                        <button
                            key={tech}
                            onClick={() => setActiveFilter(tech)}
                            className={`px-4 py-2 rounded-full text-sm font-medium transition-all duration-200 ${
                                activeFilter === tech
                                    ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-500/30'
                                    : 'bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700'
                            }`}
                        >
                            {tech}
                        </button>
                    ))}
                </div>
            )}

            {/* Project Grid */}
            {filteredProjects.length > 0 ? (
                <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    {filteredProjects.map((project) => (
                        <ProjectCard key={project.id} project={project} />
                    ))}
                </div>
            ) : (
                <div className="text-center py-12 text-gray-500 dark:text-gray-400">
                    <p>Tidak ada proyek ditemukan untuk filter ini.</p>
                </div>
            )}
        </div>
    );
}

function ProjectCard({ project }) {
    return (
        <div className="group bg-white dark:bg-gray-800 rounded-xl overflow-hidden shadow-sm border border-gray-200 dark:border-gray-700 hover:shadow-xl hover:border-indigo-300 dark:hover:border-indigo-600 transition-all duration-300 hover:-translate-y-1">
            {/* Image */}
            <div className="relative overflow-hidden aspect-video bg-gray-100 dark:bg-gray-700">
                {project.image_url ? (
                    <img
                        src={project.image_url}
                        alt={project.title}
                        className="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                    />
                ) : (
                    <div className="w-full h-full flex items-center justify-center text-gray-400">
                        <svg className="w-12 h-12" fill="none" viewBox="0 0 24 24" strokeWidth="1" stroke="currentColor">
                            <path strokeLinecap="round" strokeLinejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909M3.75 21h16.5A2.25 2.25 0 0 0 22.5 18.75V5.25A2.25 2.25 0 0 0 20.25 3H3.75A2.25 2.25 0 0 0 1.5 5.25v13.5A2.25 2.25 0 0 0 3.75 21Z" />
                        </svg>
                    </div>
                )}
                {/* Overlay on hover */}
                {project.repository_link && (
                    <div className="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <a
                            href={project.repository_link}
                            target="_blank"
                            rel="noopener noreferrer"
                            className="px-5 py-2.5 bg-white text-gray-900 rounded-lg font-medium text-sm hover:bg-gray-100 transition-colors shadow-lg"
                        >
                            Lihat Proyek →
                        </a>
                    </div>
                )}
            </div>

            {/* Content */}
            <div className="p-5">
                <h3 className="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                    {project.title}
                </h3>
                <p className="text-sm text-gray-600 dark:text-gray-400 mb-4 line-clamp-3">
                    {project.description}
                </p>

                {/* Tech Stack Tags */}
                {project.tech_stack.length > 0 && (
                    <div className="flex flex-wrap gap-1.5">
                        {project.tech_stack.map((tech, index) => (
                            <span
                                key={index}
                                className="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-50 text-indigo-700 dark:bg-indigo-900/40 dark:text-indigo-300"
                            >
                                {tech}
                            </span>
                        ))}
                    </div>
                )}
            </div>
        </div>
    );
}

// Mount the component
const container = document.getElementById('project-filter');
if (container) {
    createRoot(container).render(<ProjectFilter />);
}
