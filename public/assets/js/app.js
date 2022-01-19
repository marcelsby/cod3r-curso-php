(() => {
    const menuToggle = document.querySelector('.menu-toggle')

    menuToggle.onclick = e => {
        const body = document.querySelector('body')
        body.classList.toggle('hide-sidebar')
    }
})()
