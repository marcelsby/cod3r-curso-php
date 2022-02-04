(() => {
    const menuToggle = document.querySelector('.menu-toggle')

    menuToggle.onclick = e => {
        const body = document.querySelector('body')
        body.classList.toggle('hide-sidebar')
    }
})()

function addOneSecond(hours, minutes, seconds) {
    const date = new Date()
    date.setHours(parseInt(hours), parseInt(minutes), (parseInt(seconds) + 1))

    return date.toLocaleTimeString('pt-BR')
}

(() => {
    const activeClock = document.querySelector('[active-clock]')

    if (activeClock) {
        setInterval(() => {
            const [hours, minutes, seconds] = activeClock.innerHTML.split(':')
            const updatedTime = addOneSecond(hours, minutes, seconds)
            activeClock.innerHTML = updatedTime
        }, 1000);
    }
})()
