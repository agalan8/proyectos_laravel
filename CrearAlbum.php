namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Album;
use App\Models\Cancion;

class CrearAlbum extends Component
{
    public $nombre;
    public $cancionesSeleccionadas = [];

    public function crearAlbum()
    {
        $this->validate([
            'nombre' => 'required|string|max:255',
            'cancionesSeleccionadas' => 'array',
        ]);

        $album = Album::create([
            'nombre' => $this->nombre,
        ]);

        // Sincronizar canciones con el álbum
        $album->canciones()->sync($this->cancionesSeleccionadas);

        // Resetear formulario
        $this->reset(['nombre', 'cancionesSeleccionadas']);

        session()->flash('mensaje', 'Álbum creado con éxito.');
    }

    public function render()
    {
        return view('livewire.crear-album', [
            'canciones' => Cancion::all(),
        ]);
    }
}
