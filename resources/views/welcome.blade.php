<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Siddiq Ahrais — Portfolio</title>
    <meta name="description" content="Portfolio of Siddiq Ahrais — Developer, Creator, Problem Solver.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#0a0a0f] text-gray-200 antialiased overflow-x-hidden" x-data="portfolio()">

    {{-- ═══ FLOATING NAVIGATION ═══ --}}
    <nav class="fixed top-4 left-1/2 -translate-x-1/2 z-50 nav-floating rounded-full px-6 py-3 flex items-center gap-6 text-sm font-medium transition-all duration-500"
         :class="scrolled ? 'opacity-100 translate-y-0' : 'opacity-0 -translate-y-4'"
         id="main-nav">
        <a href="#hero" class="text-gray-400 hover:text-white transition-colors duration-300">Home</a>
        <a href="#about" class="text-gray-400 hover:text-white transition-colors duration-300">About</a>
        <a href="#skills" class="text-gray-400 hover:text-white transition-colors duration-300">Skills</a>
        <a href="#projects" class="text-gray-400 hover:text-white transition-colors duration-300">Projects</a>
        <a href="#contact" class="text-gray-400 hover:text-white transition-colors duration-300">Contact</a>
        @auth
        <a href="{{ url('/dashboard') }}" class="ml-2 px-4 py-1.5 rounded-full bg-indigo-500/20 text-indigo-300 border border-indigo-500/30 hover:bg-indigo-500/30 transition-all duration-300 text-xs">Dashboard</a>
        @endauth
    </nav>

    {{-- ═══ AMBIENT BACKGROUND ═══ --}}
    <div class="fixed inset-0 pointer-events-none overflow-hidden" aria-hidden="true">
        <div class="blob w-[500px] h-[500px] bg-indigo-600 top-[-10%] left-[-5%]"></div>
        <div class="blob w-[400px] h-[400px] bg-violet-600 top-[30%] right-[-10%]" style="animation-delay: -4s;"></div>
        <div class="blob w-[350px] h-[350px] bg-fuchsia-600 bottom-[10%] left-[20%]" style="animation-delay: -8s;"></div>
    </div>

    {{-- ═══ HERO SECTION ═══ --}}
    <section id="hero" class="relative min-h-screen flex items-center justify-center px-6">
        <div class="max-w-4xl mx-auto text-center reveal" id="hero-content">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/5 border border-white/10 text-sm text-gray-400 mb-8">
                <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                Available for work
            </div>
            <h1 class="text-5xl sm:text-6xl lg:text-8xl font-black tracking-tight leading-[0.9] mb-6">
                <span class="text-white">Hi, I'm</span><br>
                <span class="gradient-text">Siddiq Ahrais</span>
            </h1>
            <p class="text-lg sm:text-xl text-gray-400 max-w-2xl mx-auto mb-10 leading-relaxed">
                I build things for the web. A passionate developer crafting
                <span class="text-indigo-400">beautiful</span> and
                <span class="text-violet-400">functional</span> digital experiences.
            </p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="#projects" class="btn-glow px-8 py-3.5 bg-indigo-600 hover:bg-indigo-500 text-white font-semibold rounded-full transition-all duration-300 text-sm z-10">
                    View My Work →
                </a>
                <a href="#contact" class="px-8 py-3.5 border border-white/10 hover:border-white/25 text-gray-300 hover:text-white rounded-full transition-all duration-300 text-sm">
                    Get In Touch
                </a>
            </div>
        </div>
        {{-- Scroll indicator --}}
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 text-gray-500 text-xs">
            <span>Scroll</span>
            <div class="w-5 h-8 border border-gray-600 rounded-full flex justify-center pt-1.5">
                <div class="w-1 h-2 bg-gray-400 rounded-full animate-bounce"></div>
            </div>
        </div>
    </section>

    {{-- ═══ ABOUT SECTION ═══ --}}
    <section id="about" class="relative py-32 px-6">
        <div class="max-w-5xl mx-auto">
            <div class="reveal">
                <p class="text-indigo-400 font-medium text-sm tracking-widest uppercase mb-3">About Me</p>
                <h2 class="text-4xl sm:text-5xl font-bold text-white mb-12">Who I Am<span class="text-indigo-500">.</span></h2>
            </div>
            <div class="grid lg:grid-cols-2 gap-12 items-start">
                <div class="reveal space-y-6">
                    <p class="text-gray-400 leading-relaxed text-lg">
                        I'm a developer who loves turning ideas into reality through code.
                        With a focus on clean architecture and modern technology stacks,
                        I create applications that are not only functional but also delightful to use.
                    </p>
                    <p class="text-gray-400 leading-relaxed text-lg">
                        My journey in tech has led me through various domains — from building
                        responsive web applications to crafting backend systems that scale.
                        I'm always learning, always building.
                    </p>
                    <div class="grid grid-cols-2 gap-6 pt-4">
                        <div class="glass-card rounded-xl p-5 text-center">
                            <div class="text-3xl font-bold gradient-text mb-1">10+</div>
                            <div class="text-gray-500 text-sm">Projects Built</div>
                        </div>
                        <div class="glass-card rounded-xl p-5 text-center">
                            <div class="text-3xl font-bold gradient-text mb-1">5+</div>
                            <div class="text-gray-500 text-sm">Technologies</div>
                        </div>
                    </div>
                </div>
                <div class="reveal glass-card rounded-2xl p-8">
                    <h3 class="text-white font-semibold text-lg mb-6">Quick Facts</h3>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3">
                            <span class="text-indigo-400 mt-1">▹</span>
                            <span class="text-gray-400">Currently exploring <span class="text-white">Laravel</span> & <span class="text-white">React</span> ecosystems</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-indigo-400 mt-1">▹</span>
                            <span class="text-gray-400">Passionate about <span class="text-white">clean code</span> and <span class="text-white">UI/UX design</span></span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-indigo-400 mt-1">▹</span>
                            <span class="text-gray-400">Love solving complex problems with <span class="text-white">elegant solutions</span></span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-indigo-400 mt-1">▹</span>
                            <span class="text-gray-400">Always open to <span class="text-white">collaboration</span> and new challenges</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- ═══ SKILLS SECTION ═══ --}}
    <section id="skills" class="relative py-32 px-6">
        <div class="max-w-5xl mx-auto">
            <div class="reveal">
                <p class="text-indigo-400 font-medium text-sm tracking-widest uppercase mb-3">Expertise</p>
                <h2 class="text-4xl sm:text-5xl font-bold text-white mb-16">Skills & Tools<span class="text-indigo-500">.</span></h2>
            </div>
            <div class="grid md:grid-cols-2 gap-8 stagger-children" id="skills-grid">
                {{-- Skill items --}}
                @php
                $skills = [
                    ['name' => 'HTML / CSS', 'level' => 90, 'icon' => '🎨'],
                    ['name' => 'JavaScript', 'level' => 80, 'icon' => '⚡'],
                    ['name' => 'PHP / Laravel', 'level' => 85, 'icon' => '🔧'],
                    ['name' => 'React.js', 'level' => 70, 'icon' => '⚛️'],
                    ['name' => 'TailwindCSS', 'level' => 88, 'icon' => '💨'],
                    ['name' => 'MySQL / Database', 'level' => 75, 'icon' => '🗄️'],
                    ['name' => 'Git / Version Control', 'level' => 78, 'icon' => '📦'],
                    ['name' => 'Java', 'level' => 65, 'icon' => '☕'],
                ];
                @endphp
                @foreach($skills as $skill)
                <div class="glass-card rounded-xl p-5 group hover:border-indigo-500/30 transition-all duration-300">
                    <div class="flex items-center justify-between mb-3">
                        <div class="flex items-center gap-3">
                            <span class="text-xl">{{ $skill['icon'] }}</span>
                            <span class="text-white font-medium">{{ $skill['name'] }}</span>
                        </div>
                        <span class="text-indigo-400 text-sm font-mono">{{ $skill['level'] }}%</span>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-bar-fill" style="max-width: {{ $skill['level'] }}%"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ═══ PROJECTS SECTION ═══ --}}
    <section id="projects" class="relative py-32 px-6">
        <div class="max-w-6xl mx-auto">
            <div class="reveal">
                <p class="text-indigo-400 font-medium text-sm tracking-widest uppercase mb-3">Portfolio</p>
                <h2 class="text-4xl sm:text-5xl font-bold text-white mb-4">Featured Projects<span class="text-indigo-500">.</span></h2>
                <p class="text-gray-400 text-lg mb-16 max-w-2xl">A selection of projects I've built — each one a unique challenge and learning experience.</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 stagger-children" id="projects-grid">
                @php
                $projects = [
                    [
                        'title' => 'Portfolio Website',
                        'desc' => 'A modern portfolio built with Laravel, Blade, and TailwindCSS featuring glassmorphism design.',
                        'tags' => ['Laravel', 'TailwindCSS', 'Blade'],
                        'color' => 'from-indigo-500/20 to-violet-500/20',
                        'border' => 'hover:border-indigo-500/40',
                    ],
                    [
                        'title' => 'Adventure Game',
                        'desc' => 'A JavaFX-based adventure game with combat mechanics, inventory system, and immersive UI.',
                        'tags' => ['Java', 'JavaFX', 'CSS'],
                        'color' => 'from-emerald-500/20 to-teal-500/20',
                        'border' => 'hover:border-emerald-500/40',
                    ],
                    [
                        'title' => 'TipTap Editor',
                        'desc' => 'A rich text editor application with advanced formatting, collaboration features.',
                        'tags' => ['React', 'TipTap', 'JavaScript'],
                        'color' => 'from-amber-500/20 to-orange-500/20',
                        'border' => 'hover:border-amber-500/40',
                    ],
                ];
                @endphp
                @foreach($projects as $project)
                <div class="project-card glass-card rounded-2xl overflow-hidden group {{ $project['border'] }}">
                    <div class="h-40 bg-gradient-to-br {{ $project['color'] }} flex items-center justify-center">
                        <div class="w-16 h-16 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-2xl group-hover:scale-110 transition-transform duration-500">
                            💻
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-white font-bold text-lg mb-2 group-hover:text-indigo-300 transition-colors">{{ $project['title'] }}</h3>
                        <p class="text-gray-400 text-sm leading-relaxed mb-4">{{ $project['desc'] }}</p>
                        <div class="flex flex-wrap gap-2">
                            @foreach($project['tags'] as $tag)
                            <span class="px-3 py-1 text-xs rounded-full bg-white/5 text-gray-400 border border-white/5">{{ $tag }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ═══ CONTACT SECTION ═══ --}}
    <section id="contact" class="relative py-32 px-6">
        <div class="max-w-3xl mx-auto text-center">
            <div class="reveal">
                <p class="text-indigo-400 font-medium text-sm tracking-widest uppercase mb-3">Get In Touch</p>
                <h2 class="text-4xl sm:text-5xl font-bold text-white mb-6">Let's Work Together<span class="text-indigo-500">.</span></h2>
                <p class="text-gray-400 text-lg mb-12 leading-relaxed">
                    Have a project in mind or just want to chat? Feel free to reach out.
                    I'm always open to discussing new opportunities.
                </p>
                <a href="mailto:hello@example.com" class="btn-glow inline-flex items-center gap-2 px-10 py-4 bg-indigo-600 hover:bg-indigo-500 text-white font-semibold rounded-full transition-all duration-300 z-10">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    Say Hello
                </a>
            </div>
        </div>
    </section>

    {{-- ═══ FOOTER ═══ --}}
    <footer class="border-t border-white/5 py-8 px-6">
        <div class="max-w-5xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-4 text-sm text-gray-500">
            <p>© {{ date('Y') }} Siddiq Ahrais. All rights reserved.</p>
            <div class="flex items-center gap-6">
                <a href="#" class="hover:text-indigo-400 transition-colors">GitHub</a>
                <a href="#" class="hover:text-indigo-400 transition-colors">LinkedIn</a>
                <a href="#" class="hover:text-indigo-400 transition-colors">Twitter</a>
            </div>
        </div>
    </footer>

    {{-- ═══ PORTFOLIO SCRIPTS ═══ --}}
    <script>
    function portfolio() {
        return {
            scrolled: false,
            init() {
                // Nav scroll detection
                window.addEventListener('scroll', () => {
                    this.scrolled = window.scrollY > 100;
                });

                // Intersection Observer for reveal animations
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('visible');
                            // Animate skill bars
                            entry.target.querySelectorAll('.skill-bar-fill').forEach(bar => {
                                bar.classList.add('animate');
                            });
                        }
                    });
                }, { threshold: 0.15 });

                document.querySelectorAll('.reveal, .stagger-children').forEach(el => {
                    observer.observe(el);
                });

                // Auto-reveal hero
                setTimeout(() => {
                    document.getElementById('hero-content')?.classList.add('visible');
                }, 200);
            }
        }
    }
    </script>
</body>
</html>
