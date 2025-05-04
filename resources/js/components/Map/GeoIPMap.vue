<template>
  <div id="geoip-map" style="height: 600px;"></div>
</template>

<script>
import * as echarts from 'echarts';

export default {
  name: 'GeoIPMap',
  mounted() {
    const chart = echarts.init(document.getElementById('geoip-map'));
    chart.setOption({
      title: { text: 'Device Map' },
      tooltip: {},
      geo: {
        map: 'world',
        roam: true,
      },
      series: []
    });

    fetch('/api/map/devices')
      .then(res => res.json())
      .then(data => {
        chart.setOption({
          series: [{
            name: 'Devices',
            type: 'scatter',
            coordinateSystem: 'geo',
            data: data.map(d => ({
              name: d.ip_address,
              value: [d.location.longitude, d.location.latitude],
              itemStyle: { color: d.status === 'online' ? 'green' : 'red' }
            }))
          }]
        });
      });
  }
}
</script>
