
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: labels_pendapatan,
    datasets: [{
      label: 'Total Nilai Kontrak Tahunan',
      data: summary_pendapatan,
      borderWidth: 2,
      backgroundColor: '#6777ef',
      borderColor: '#6777ef',
      borderWidth: 2.5,
      pointBackgroundColor: '#ffffff',
      pointRadius: 6
    }]
  },
  options: {
    legend: {
      display: false
    },
    scales: {
      yAxes: [{
        type: 'logarithmic',
        position: 'left',
        gridLines: {
          drawBorder: false,
          color: '#f2f2f2',
        },
        ticks: {
          stepSize: 100,
          beginAtZero: false
        }
      }],
      xAxes: [{
        ticks: {
          display: true
        },
        gridLines: {
          display: true
        }
      }]
    },
  }
});

var ctx = document.getElementById("myChart3").getContext('2d');
var myChart = new Chart(ctx, {
  type: 'pie',
  data: {
    datasets: [{
      data: [
        sa9,
        sa10,
        sa11,
        sa12
      ],
      backgroundColor: [
        '#ffd166',
        '#ee964b',
        '#118ab2',
        '#06d6a0'
      ],
      label: 'Dataset 1'
    }],
    labels: [
      'Kontrak',
      'Laporan / BA',
      'Tagihan',
      'Terbayar',
    ],
  },
  options: {
    responsive: true,
    maintainAspectRatio : false,
    legend: {
      position: 'bottom',
    },
  }
});

var ctx = document.getElementById("myChart4").getContext('2d');
var myChart = new Chart(ctx, {
  type: 'pie',
  data: {
    datasets: [{
      data: [
        sp1,
        sp2,
        sp3,
        sp4,
      ],
      backgroundColor: [
        '#d2dae2',
        '#4bcffa',
        '#ffd32a',
        '#0be881',
      ],
      label: 'Dataset 1'
    }],
    labels: [
      'Batal',
      'Belum Jalan',
      'Running',
      'Selesai'
    ],
  },
  options: {
    responsive: true,
    maintainAspectRatio : false,
    legend: {
      position: 'bottom',
    },
  }
});