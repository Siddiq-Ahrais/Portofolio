<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MessageController extends Controller
{
    /**
     * Display a listing of messages.
     */
    public function index(): View
    {
        $messages = Message::latest()->paginate(15);

        return view('admin.messages.index', compact('messages'));
    }

    /**
     * Display the specified message.
     * Automatically marks the message as read.
     */
    public function show(Message $message): View
    {
        // Auto-mark as read when viewing
        if (!$message->is_read) {
            $message->markAsRead();
        }

        return view('admin.messages.show', compact('message'));
    }

    /**
     * Toggle the read status of a message.
     */
    public function toggleRead(Message $message): RedirectResponse
    {
        $message->update(['is_read' => !$message->is_read]);

        $status = $message->is_read ? 'dibaca' : 'belum dibaca';

        return redirect()
            ->back()
            ->with('success', "Pesan ditandai sebagai {$status}.");
    }

    /**
     * Remove the specified message from storage.
     */
    public function destroy(Message $message): RedirectResponse
    {
        $message->delete();

        return redirect()
            ->route('admin.messages.index')
            ->with('success', 'Pesan berhasil dihapus!');
    }
}
