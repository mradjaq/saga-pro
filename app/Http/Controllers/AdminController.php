<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use App\Artikel;
use App\User;
use App\Level;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $kategoris = Kategori::orderBy('id', 'DESC')->get();

        return view('admin.home', compact('kategoris'));
    }


    public function tambahKategori()
    {
        return view('admin.kategori.tambahKategori');
    }

    public function editKategori($slug)
    {
        $kategori = Kategori::where('slug', $slug)->first();

        return view('admin.kategori.editKategori', compact('kategori'));
    }

    public function readKategori($slug)
    {
        $kategori = Kategori::where('slug', $slug)->first();

        return view('admin.kategori.readKategori', compact('kategori'));
    }

    public function postKategori(Request $request)
    {
        $rules = [
            'kategori' => 'required|string|max:255',
        ];
        $messages = [
            'required' => 'Field is required',
            'max' => 'Max length is 255',
        ];
        $this->validate($request, $rules, $messages);

        $now = Carbon::now();

        $kategori = new Kategori;
        $kategori->kategori = $request->kategori;
        $kategori->slug = strtolower($request->kategori . '-' . $now);
        $kategori->save();

        return redirect()->route('admin')->with('success', 'Kategori telah berhasil di tambahkan');
    }

    public function updateKategori(Request $request, $slug)
    {
        $rules = [
            'kategori' => 'required|string|max:255',
        ];
        $messages = [
            'required' => 'Field is required',
            'max' => 'Max length is 255',
        ];
        $this->validate($request, $rules, $messages);

        $kategori = Kategori::where('slug', $slug)->first();
        $kategori->kategori = $request->kategori;
        $kategori->save();

        return redirect()->route('admin')->with('success', 'Kategori telah berhasil diupdate');
    }

    public function deleteKategori($slug)
    {
        $kategori = Kategori::where('slug', $slug)->first();

        $kategori->delete();

        return redirect()->route('admin')->with('danger', 'Kategori telah berhasil dihapus');
    }

    public function artikel()
    {
        $artikels = DB::table('artikels')
            ->select([
                'artikels.title as title',
                'artikels.slug as slug',
                'artikels.content as content',
                'artikels.banner as banner',
                'artikels.category_id as category_id',
                'kategoris.kategori as kategori',
            ])
            ->leftjoin('kategoris', 'artikels.category_id', '=', 'kategoris.id')
            ->orderByDesc('artikels.id')
            ->get();

        return view('admin.artikel.artikel', compact('artikels'));
    }

    public function tambahArtikel()
    {
        $kategoris = Kategori::all();

        return view('admin.artikel.tambahArtikel', compact('kategoris'));
    }

    public function editArtikel($slug)
    {
        $artikel = Artikel::where('slug', $slug)->first();

        $kategoris = Kategori::get();

        return view('admin.artikel.editArtikel', compact('artikel', 'kategoris'));
    }

    public function readArtikel($slug)
    {
        $artikel = DB::table('artikels')
            ->select([
                'artikels.title as title',
                'artikels.slug as slug',
                'artikels.content as content',
                'artikels.banner as banner',
                'artikels.category_id as category_id',
                'kategoris.kategori as kategori',
            ])
            ->leftjoin('kategoris', 'artikels.category_id', '=', 'kategoris.id')
            ->where('artikels.slug', $slug)
            ->first();

        return view('admin.artikel.readArtikel', compact('artikel'));
    }

    public function postArtikel(Request $request)
    {
        $rules = [
            'title' => 'required|string|max:255',
            'category_id' => 'required',
            'banner' => 'required|mimes:jpg,png,jpeg,svg|max:2048',
            'content' => 'required|max:255',
        ];
        $messages = [
            'required' => 'Field is required',
            'max' => 'Max length is 255',
        ];
        $this->validate($request, $rules, $messages);

        $now = Carbon::now();

        $artikel = new Artikel;
        $artikel->title = $request->title;
        $artikel->slug = strtolower($request->title . '-' . $now);
        $artikel->category_id = $request->category_id;
        $artikel->banner = $request->file('banner')->store('banners');
        $artikel->content = $request->content;
        $artikel->save();

        return redirect()->route('artikel')->with('success', 'Artikel telah berhasil ditambahkan');
    }

    public function updateArtikel(Request $request, $slug)
    {
        $rules = [
            'title' => 'required|string|max:255',
            'category_id' => 'required',
            'banner' => 'required|mimes:jpg,png,jpeg,svg|max:2048',
            'content' => 'required|max:255',
        ];
        $this->validate($request, $rules);

        $now = Carbon::now();

        $artikel = Artikel::where('slug', $slug)->first();
        $artikel->title = $request->title;
        $artikel->slug = strtolower($request->title . '-' . $now);
        $artikel->category_id = $request->category_id;
        if ($artikel->banner) {
            Storage::delete($artikel->banner);
        }
        $artikel->banner = $request->file('banner')->store('banners');
        $artikel->content = $request->content;
        $artikel->save();

        return redirect()->route('artikel')->with('success', 'Artikel telah berhasil diupdate');
    }

    public function deleteArtikel($slug)
    {
        $artikel = Artikel::where('slug', $slug)->first();
        if ($artikel->banner) {
            Storage::delete($artikel->banner);
        }
        $artikel->delete();

        return redirect()->route('artikel')->with('danger', 'Artikel telah berhasil dihapus');
    }

    public function user()
    {
        $users = DB::table('users')
            ->select([
                'users.id as id',
                'users.name as name',
                'users.email as email',
                'users.level_id as level_id',
                'level.level as level'
            ])
            ->leftjoin('level', 'users.level_id', '=', 'level.id')
            ->get();

        return view('admin.user.user', compact('users'));
    }

    public function tambahUser()
    {
        $levels = Level::all();

        return view('admin.user.tambahUser', compact('levels'));
    }

    public function editUser($id)
    {
        $user = User::where('id', $id)->first();

        $levels = Level::get();

        return view('admin.user.editUser', compact('user', 'levels'));
    }

    public function postUser(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8',
            'level_id' => 'required'
        ];
        $this->validate($request, $rules);

        $now = Carbon::now();

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->level_id = $request->level_id;
        $user->save();

        return redirect()->route('user')->with('success', 'User telah berhasil di tambahkan');
    }

    public function updateUser(Request $request, $id)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users,email,' . $id,
            'password' => 'required|string|min:8',
            'level_id' => 'required'
        ];
        $this->validate($request, $rules);

        $user = User::where('id', $id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->level_id = $request->level_id;
        $user->save();

        return redirect()->route('user')->with('success', 'User telah berhasil diupdate');
    }

    public function deleteUser($id)
    {
        $user = User::where('id', $id)->first();
        $user->delete();

        return redirect()->route('user')->with('danger', 'User telah berhasil dihapus');
    }

    public function readUser($id)
    {
        $user = DB::table('users')
            ->select([
                'users.id as id',
                'users.name as name',
                'users.email as email',
                'level.level as level',
            ])
            ->leftjoin('level', 'users.level_id', '=', 'level.id')
            ->where('users.id', $id)
            ->first();

        return view('admin.user.readUser', compact('user'));
    }
}
