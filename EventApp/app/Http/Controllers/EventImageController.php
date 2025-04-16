<?php
namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventImageController extends Controller
{
    public function edit(Event $event)
    {
        return view('events.image-edit', compact('event'));
    }
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($event->image_path) {
                Storage::disk('public')->delete($event->image_path);
            }
            
            $imagePath = $request->file('image')->store('event-images', 'public');
            $event->image_path = $imagePath;
            $event->save();

            return redirect()->route('events.show', $event)
                ->with('success', 'Gambar event berhasil diperbarui!');
        }

        return redirect()->route('events.show', $event)
            ->with('error', 'Tidak ada gambar yang diunggah!');
    }

    public function destroy(Event $event)
    {
        if ($event->image_path) {
            Storage::disk('public')->delete($event->image_path);
            
            $event->image_path = null;
            $event->save();
            
            return redirect()->route('events.show', $event)
                ->with('success', 'Gambar event berhasil dihapus!');
        }

        return redirect()->route('events.show', $event)
            ->with('error', 'Event tidak memiliki gambar!');
    }
}