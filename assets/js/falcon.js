const messageBox = document.querySelector('.messagebox')
const messageBoxIcon = document.querySelector('#monitorMessageIcon')
const closeMessageIcon = document.querySelector('.bi-x-circle')
messageBoxIcon.addEventListener('click', () => {
    if (messageBox.classList.contains('d-none')) {
        messageBox.classList.remove('d-none')

    } else {
        messageBox.classList.add('d-none')

    }
})

closeMessageIcon.addEventListener('click', () => messageBox.classList.add('d-none'))

