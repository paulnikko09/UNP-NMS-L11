<template>
  <div class="grid grid-cols-3 gap-4">
    <div class="p-4 bg-white shadow rounded" v-for="stat in stats" :key="stat.label">
      <h3 class="text-lg font-semibold">{{ stat.label }}</h3>
      <p class="text-xl">{{ stat.value }}</p>
    </div>
  </div>
</template>

<script>
export default {
  name: 'StatCards',
  data() {
    return {
      stats: []
    };
  },
  mounted() {
    fetch('/api/dashboard/stats')
      .then(res => res.json())
      .then(data => {
        this.stats = data;
      });
  }
}
</script>
