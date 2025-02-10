<div>
    <form action="{{ route('comentarios.store', ['comentable_type' => $comentableType, 'comentable_id' => $comentableId]) }}"
        method="POST" class="w-full mt-2">
      @csrf
      <textarea name="respuesta" id="respuesta" cols="30" rows="2" class="border rounded p-2 w-full"></textarea>
      <div class="flex justify-end mt-2">
          <x-primary-button>Responder</x-primary-button>
      </div>
    </form><!-- Happiness is not something readymade. It comes from your own actions. - Dalai Lama -->
</div>
