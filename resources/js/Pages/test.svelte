<script>
  import { router } from '@inertiajs/svelte';

  function goHome() {
    router.post('/goHome');
  }
</script>

<button onclick={goHome}>
    Go Home
</button>