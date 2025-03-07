<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hero_Section;

class HeroSectionController extends Controller
{
    public function index()
    {
        $heroSection = Hero_Section::all();
        $heroSectionExists = $heroSection->isNotEmpty();
        return view('Admin.HeroSection.index', compact('heroSection', 'heroSectionExists'));
    }

    public function create(){
        return view('Admin.HeroSection.create');
    }

    public function store(Request $request){
        $request->validate([
            'header' => 'required|string|max:255',
            'paragraph' => 'required|string',
        ]);

        $heroSection = new Hero_Section([
            'id_hero_sections' => Hero_Section::generateNextId(),
            'header' => $request->get('header'),
            'paragraph' => $request->get('paragraph'),
        ]);

        $heroSection->save();
        return redirect()->route('Admin.HeroSection.index')->with('success', 'Data Home berhasil disimpan!');
    }

    public function edit(Hero_Section $heroSection){
        return view('Admin.HeroSection.edit', compact('heroSection'));
    }

    public function update(Request $request, Hero_Section $heroSection)
    {
        $request->validate([
            'header' => 'required|string|max:255',
            'paragraph' => 'required|string',
        ]);

        $data = [
            'header' => $request->header,
            'paragraph' => $request->paragraph,
        ];
        $heroSection->update($data);
        return redirect()->route('Admin.HeroSection.index')->with('success', 'Data Home berhasil diedit');
    }

    public function destroy($id){
        $hero_Section = Hero_Section::findOrFail($id);
        $hero_Section->delete();

        return redirect()->route('Admin.HeroSection.index')->with('success', 'Data Home berhasil dihapus!');
    }
}
    