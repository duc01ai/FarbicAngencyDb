const advancedSearchButton = document.getElementById('advancedSearch');
const advancedSearchForm = document.getElementById('advancedSearchForm');
var openCheck = false;
advancedSearchForm.style.opacity = 0;

advancedSearchButton.addEventListener('click', function () {
    const advancedCheck = document.getElementById('advancedCheck');
    if (!openCheck) {
        openCheck = true;
        advancedCheck.value = openCheck;
        advancedSearchForm.style.opacity = 1;
        console.log(openCheck);
    }
    else if (openCheck) {
        openCheck = false;
        advancedCheck.value = openCheck;
        advancedSearchForm.style.opacity = 0;
        console.log(openCheck);
    }
})

// const searchButton = document.getElementById('searchButton');

// searchButton.addEventListener('click', function () {
//     searchButton.value = 'true';
//     console.log(searchButton);
// })