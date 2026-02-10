<script>
  import axios from 'axios';

  async function openNewWindow() {
    await axios.post('/settings', {
    }).then(response => {
        console.log('success');
    }).catch(error => {
        console.log('error');
    });
  }
</script>

<button on:click={openNewWindow}>
    Open Settings
</button>