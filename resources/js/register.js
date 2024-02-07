const passagerForm = document.getElementById('passagerForm');
const chauffeurForm = document.getElementById('chauffeurForm');

document.getElementById('passager-btn').addEventListener('click', function () {
    passagerForm.classList.remove('hidden');
    chauffeurForm.classList.add('hidden');
});

document.getElementById('chauffeur-btn').addEventListener('click', function () {
    passagerForm.classList.add('hidden');
    chauffeurForm.classList.remove('hidden');
});