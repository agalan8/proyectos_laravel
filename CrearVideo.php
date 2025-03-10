namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Video;
use App\Models\Categoria;

class CrearVideo extends Component
{
    public $titulo;
    public $categoriasSeleccionadas = [];

    public function crearVideo()
    {
        $this->validate([
            'titulo' => 'required|string|max:255',
            'categoriasSeleccionadas' => 'array',
        ]);

        $video = Video::create([
            'titulo' => $this->titulo,
        ]);

        // Relacionar video con categorías seleccionadas
        $video->categorias()->sync($this->categoriasSeleccionadas);

        // Resetear el formulario
        $this->reset(['titulo', 'categoriasSeleccionadas']);

        session()->flash('mensaje', 'Video creado con éxito.');
    }

    public function render()
    {
        return view('livewire.crear-video', [
            'categorias' => Categoria::all(),
        ]);
    }
}
