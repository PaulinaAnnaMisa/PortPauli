// Generiere einfache Labels (Tage 1–30)
const labels = Array.from({ length: 30 }, (_, i) => `Tag ${i + 1}`);

// Dummy-Daten simulieren (später per API austauschbar)
const employerData = labels.map(() => Math.floor(Math.random() * 100) + 50);
const interestData = labels.map(() => Math.floor(Math.random() * 80) + 30);

// Chart-Optionen – gleiche für beide
const options = {
  responsive: true,
  scales: {
    y: { beginAtZero: true }
  },
  plugins: {
    legend: { display: false },
  },
};

// Arbeitgeber Chart
new Chart(document.getElementById('employerChart'), {
  type: 'line',
  data: {
    labels,
    datasets: [{
      label: 'Arbeitgeber',
      data: employerData,
      borderColor: 'rgb(59,130,246)', // Tailwind blue-500
      backgroundColor: 'rgba(59,130,246,0.2)',
      fill: true,
      tension: 0.3
    }]
  },
  options
});

// Interessenten Chart
new Chart(document.getElementById('interestChart'), {
  type: 'line',
  data: {
    labels,
    datasets: [{
      label: 'Interessenten',
      data: interestData,
      borderColor: 'rgb(34,197,94)', // Tailwind green-500
      backgroundColor: 'rgba(34,197,94,0.2)',
      fill: true,
      tension: 0.3
    }]
  },
  options
});
