

 // Fetch data from the backend
    fetch('/Library/controllers/fetch_data.php')
        .then(response => response.json())
        .then(data => {
            // Populate cards with fetched data
            document.querySelector('#books .card-number').textContent = data.totalBooks;
            document.querySelector('#books .change-percentage').textContent = `${data.totalBooksChange}%`;
            
            document.querySelector('#totalMembersCard .card-number').textContent = data.totalMembers;
            document.querySelector('#totalMembersCard .change-percentage').textContent = `${data.totalMembersChange}%`;
            
            document.querySelector('#activeLoansCard .card-number').textContent = data.activeLoans;
            document.querySelector('#activeLoansCard .change-percentage').textContent = `${data.activeLoansChange}%`;
            
            document.querySelector('#lateReturnsCard .card-number').textContent = data.lateReturns;
            document.querySelector('#lateReturnsCard .change-percentage').textContent = `${data.lateReturnsChange}%`;

            // Prepare data for the chart
            const chartLabels = data.chartData.map(item => `Week ${item.week}`);
            const chartTotalBooks = data.chartData.map(item => item.totalBooks);
            const chartTotalMembers = data.chartData.map(item => item.totalMembers);
            const chartActiveLoans = data.chartData.map(item => item.activeLoans);
            const chartLateReturns = data.chartData.map(item => item.lateReturns);

            // Update chart with fetched data
            const chartData = {
                labels: chartLabels,
                datasets: [{
                    label: 'Total Books',
                    data: chartTotalBooks,
                    backgroundColor: '#FF6384',
                }, {
                    label: 'Total Members',
                    data: chartTotalMembers,
                    backgroundColor: '#36A2EB',
                }, {
                    label: 'Active Loans',
                    data: chartActiveLoans,
                    backgroundColor: '#FFCE56',
                }, {
                    label: 'Late Returns',
                    data: chartLateReturns,
                    backgroundColor: '#4BC0C0',
                }]
            };

            const ctx = document.getElementById('januaryOverviewChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: chartData,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Library Statistics Overview (January)'
                        }
                    },
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Week'
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Count'
                            }
                        }
                    }
                }
            });
        });

    // Navigation active link highlight
    let list = document.querySelectorAll(".navigation li");

function activeLink() {
  list.forEach((item) => {
    item.classList.remove("hovered");
  });
  this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("mouseover", activeLink));

// Menu Toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function () {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
};

document.addEventListener("DOMContentLoaded", function() {
  myFunction();
});

function myFunction() {
  var passwordField = document.getElementById("password");
  if (passwordField.type === "text") {
    passwordField.type = "password";
  } else {
    passwordField.type = "text";
  }
}
