function animateButton()
{
    const button=document.querySelector('.searchJobs');
    const loading=document.querySelector('.loader');
    // button.classList.add('animate');
    button.classList.add('hidden');
    loading.classList.remove('unloading');
    loading.classList.add('loading');
    setTimeout(() => {
        loading.classList.remove('loading');
        loading.classList.add('unloading');
        button.classList.remove('hidden');
    }, 3000);
   
}

// function openTypeMenu()
// {
//     const dropdown1=document.querySelector('.searchType');
//     button.classList.add('animate');
// }