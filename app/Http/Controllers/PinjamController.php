<?php

namespace App\Http\Controllers;
use App\Models\PInjam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pinjam = Pinjam::latest()->paginate(5);

        return view('pinjams.index',compact('pinjam'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pinjams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:6144',
            'nama' => 'required',
            'kelas' => 'required',
            'alat' => 'required',
            'peminjaman' => 'required',
            'pengembalian' => 'required',
        ]);
        $image = $request->file('image');
        $image->storeAs('public/pinjam', $image->hashName());

        pinjam::create([
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'alat' => $request->alat,
            'peminjaman' => $request->peminjaman,
            'pengembalian' => $request->pengembalian,
            'image' => $image->hashName()
        ]);

        return redirect()->route('pinjams.index')
                        ->with('success','Data created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pinjam $pinjam)
    {
        return view('pinjams.show',compact('pinjam'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pinjam $pinjam)
    {
        return view('pinjams.edit',compact('pinjam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pinjam $pinjam)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:6144',
            'nama' => 'required',
            'kelas' => 'required',
            'alat' => 'required',
            'peminjaman' => 'required',
            'pengembalian' => 'required',
        ]);
        if($request->hasFile('image')){

            $image = $request->file('image');
        $image->storeAs('public/pinjam', $image->hashName());

        Storage::delete('public/pinjam/'.$pinjam->image);

        $pinjam->update([
            'image' => $image->hashName(),
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'alat' => $request->alat,
            'peminjaman' => $request->peminjaman,
            'pengembalian' => $request->pengembalian,
        ]);
        }else{
            $pinjam->update([
                'nama' => $request->nama,
                'kelas' => $request->kelas,
                'alat' => $request->alat,
                'peminjaman' => $request->peminjaman,
                'pengembalian' => $request->pengembalian,
            ]);
        }


        return redirect()->route('pinjams.index')
                        ->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pinjam $pinjam)
    {
        $pinjam->delete();
        return redirect()->route('pinjams.index')
                        ->with('success','Data deleted successfully');
    }
}
