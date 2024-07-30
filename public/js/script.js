/*//////////////////////////////////FILTRE/////////////////////////////////////////////////////////////////////////////*/
function liveSearch() {
    // Locate the ticket elements
    let tickets = document.querySelectorAll('.tickets')
    // Locate the search input
    let search_query = document.getElementById("searchbox").value;
    // Loop through the tickets
    for (var i = 0; i < tickets.length; i++) {
        // If the text is within the ticket...
        if(tickets[i].innerText.toLowerCase()
            // ...and the text matches the search query...
            .includes(search_query.toLowerCase())) {
            // ...remove the .is-hidden class.
            tickets[i].classList.remove("is-hidden");
        } else {
            // Otherwise, add the class.
            tickets[i].classList.add("is-hidden");
        }
    }

}
/*///////////////////////////////////////////////////////////////////////////////////*/
const getCellValue = (tr, idx) => tr.children[idx].innerText || tr.children[idx].textContent;

const comparer = (idx, asc) => (a, b) => ((v1, v2) =>
        v1 !== '' && v2 !== '' && !isNaN(v1) && !isNaN(v2) ? v1 - v2 : v1.toString().localeCompare(v2)
)(getCellValue(asc ? a : b, idx), getCellValue(asc ? b : a, idx));

document.querySelectorAll('th').forEach(th => th.addEventListener('click', (() => {
    const table = th.closest('table');
    const tbody = table.querySelector('tbody');
    Array.from(tbody.querySelectorAll('tr'))
        .sort(comparer(Array.from(th.parentNode.children).indexOf(th), this.asc = !this.asc))
        .forEach(tr => tbody.appendChild(tr) );
})));
/*///////////////////////////////////////////////GRAPH///////////////////////////////////////////////////////////////*/
let termines = document.getElementById("termines").innerHTML;
let nouveaux = document.getElementById("nouveaux").innerHTML;
let enCours = document.getElementById("enCours").innerHTML;
let annules = document.getElementById("annules").innerHTML;
let total = document.getElementById("totalTicket").innerHTML;


const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Total','Terminés', 'Nouveaux', 'En cours', 'Annulés'],
        datasets: [{
            label: 'Tickets',
            data: [total,termines, nouveaux, enCours, annules],
            backgroundColor: [
                'rgba(138, 43, 226, 0.2)',
                'rgba(99, 179, 237, 0.2)',
                'rgba(104, 211, 145, 0.2)',
                'rgba(286, 173, 85, 0.2)',
                'rgba(255, 99, 132, 0.2)',
            ],
            borderColor: [
                'rgba(138, 43, 226, 1)',
                'rgba(99, 179, 237, 1)',
                'rgba(104, 211, 145, 1)',
                'rgba(286, 173, 85, 1)',
                'rgba(255, 99, 132, 1)',
            ],
            borderWidth: 2
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});



