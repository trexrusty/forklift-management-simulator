<script>
    // Props (Svelte 5 runes)
    let { title = 'Window', children, onclose, width = '400px', height = '300px' } = $props();
  
    // Dragging state
    let isDragging = $state(false);
    let x = $state(100);
    let y = $state(100);
    let offsetX = 0;
    let offsetY = 0;
  
    function startDrag(e) {
      isDragging = true;
      offsetX = e.clientX - x;
      offsetY = e.clientY - y;
      window.addEventListener('mousemove', onDrag);
      window.addEventListener('mouseup', stopDrag);
    }
  
    function onDrag(e) {
      if (!isDragging) return;
      x = e.clientX - offsetX;
      y = e.clientY - offsetY;
    }
  
    function stopDrag() {
      isDragging = false;
      window.removeEventListener('mousemove', onDrag);
      window.removeEventListener('mouseup', stopDrag);
    }
  </script>
  
  <div
    class="absolute rounded-xl shadow-2xl overflow-hidden border border-white/20"
    style="left: {x}px; top: {y}px; width: {width}; height: {height};"
  >
    <!-- Title Bar -->
    <!-- svelte-ignore a11y_no_static_element_interactions -->
    <div
      class="flex items-center gap-2 px-3 py-2 bg-gray-200/80 backdrop-blur-md cursor-grab select-none"
      onmousedown={startDrag}
    >
      <!-- Traffic Light Buttons -->
      <div class="flex gap-1.5">
        <button
          class="w-3 h-3 rounded-full bg-red-500 hover:bg-red-600 transition-colors"
          onclick={onclose}
        ></button>
        <button
          class="w-3 h-3 rounded-full bg-yellow-500 hover:bg-yellow-600 transition-colors"
        ></button>
        <button
          class="w-3 h-3 rounded-full bg-green-500 hover:bg-green-600 transition-colors"
        ></button>
      </div>
  
      <!-- Title -->
      <span class="flex-1 text-center text-sm font-medium text-gray-700">{title}</span>
  
      <!-- Spacer to balance the traffic lights -->
      <div class="w-12"></div>
    </div>
  
    <!-- Content Area -->
    <div class="bg-white/90 backdrop-blur-md h-full overflow-auto p-4">
      {@render children()}
    </div>
  </div>
  