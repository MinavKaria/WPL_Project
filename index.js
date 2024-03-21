function animateButton()
{
    const button=document.querySelector('.searchJobs');
    button.classList.add('animate');
    setTimeout(() => {
        button.classList.remove('animate');
    }, 1000);
   
}

// function openTypeMenu()
// {
//     const dropdown1=document.querySelector('.searchType');
//     button.classList.add('animate');
// }