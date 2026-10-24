<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::orderByDesc('created_at')->get();

        return view('admin.programs.index', compact('programs'));
    }

    public function create()
    {
        return view('admin.programs.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:200'],
            'slug' => ['nullable', 'string', 'max:200'],
            'category' => ['nullable', 'string', 'max:100'],
            'summary' => ['nullable', 'string', 'max:280'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'max:2048'],
            'status' => ['nullable', 'string', 'max:40'],
            'is_featured' => ['nullable', 'boolean'],
        ]);

        $data['slug'] = $this->makeUniqueSlug($data['slug'] ?? $data['title']);
        $data['status'] = $data['status'] ?? 'active';
        $data['is_featured'] = (bool) ($data['is_featured'] ?? false);

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('programs', 'public');
        }

        Program::create($data);

        return redirect()->route('admin.programs.index')->with('success', 'Program berhasil dibuat.');
    }

    public function show(Program $program)
    {
        return view('admin.programs.show', compact('program'));
    }

    public function edit(Program $program)
    {
        return view('admin.programs.edit', compact('program'));
    }

    public function update(Request $request, Program $program)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:200'],
            'slug' => ['nullable', 'string', 'max:200'],
            'category' => ['nullable', 'string', 'max:100'],
            'summary' => ['nullable', 'string', 'max:280'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'max:2048'],
            'status' => ['nullable', 'string', 'max:40'],
            'is_featured' => ['nullable', 'boolean'],
        ]);

        $data['slug'] = $this->makeUniqueSlug($data['slug'] ?? $data['title'], $program->id);
        $data['status'] = $data['status'] ?? $program->status;
        $data['is_featured'] = (bool) ($data['is_featured'] ?? false);

        if ($request->hasFile('image')) {
            if ($program->image_path) {
                Storage::disk('public')->delete($program->image_path);
            }
            $data['image_path'] = $request->file('image')->store('programs', 'public');
        }

        $program->update($data);

        return redirect()->route('admin.programs.index')->with('success', 'Program berhasil diperbarui.');
    }

    public function destroy(Program $program)
    {
        if ($program->image_path) {
            Storage::disk('public')->delete($program->image_path);
        }
        $program->delete();

        return redirect()->route('admin.programs.index')->with('success', 'Program berhasil dihapus.');
    }

    private function makeUniqueSlug(string $value, ?int $ignoreId = null): string
    {
        $slug = Str::slug($value);
        if ($slug === '') {
            $slug = 'program';
        }

        $base = $slug;
        $counter = 1;

        while (
            Program::where('slug', $slug)
                ->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $base.'-'.$counter;
            $counter++;
        }

        return $slug;
    }
}
