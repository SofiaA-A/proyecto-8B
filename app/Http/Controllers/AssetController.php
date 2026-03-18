namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;
use Illuminate\Support\Facades\Storage;

class AssetController extends Controller
{
    public function create()
    {
        return view('asset.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,mp4|max:10240'
        ]);

        $file = $request->file('file');
        $type = $file->extension() == 'mp4' ? 'video' : 'image';
        $filename = time().'_'.$file->getClientOriginalName();

        // Guardar en storage/app/public
        $file->move(public_path('storage/assets'), $filename);

        // Registrar en BD
        Asset::create([
            'name' => $file->getClientOriginalName(),
            'type' => $type,
            'path' => $filename
        ]);

        return back()->with('success', 'Archivo subido correctamente');
    }

    public function getImage($filename)
    {
        return response()->file(public_path('storage/assets/'.$filename));
    }

    public function getVideo($filename)
    {
        return response()->file(public_path('storage/assets/'.$filename));
    }
}
