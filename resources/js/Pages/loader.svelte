<script>
    import { router } from '@inertiajs/svelte';
    import Window from './Components/window.svelte';  
    export let saves;
  
    function selectSave(save_id) {
      router.post(`/selectSave/${save_id}`);
    }
  </script>
  
  <div class="w-screen h-screen bg-gradient-to-br from-blue-400 to-purple-600 relative overflow-hidden">
    <Window title="Load Game" width="500px" height="400px">
      <div class="space-y-2">
        {#each saves as save}
          <button
            class="w-full text-left px-4 py-3 rounded-lg bg-gray-100 hover:bg-blue-100 transition-colors"
            onclick={() => selectSave(save.id)}
          >
            {save.name}
          </button>
        {/each}
      </div>
    </Window>
  </div>