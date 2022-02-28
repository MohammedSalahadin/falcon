function ToggleElementsClass(elementVar, action, elementClass, toggleClass) { document.querySelector(elementVar).addEventListener(action, () => { document.querySelector(elementClass).classList.toggle(toggleClass) }) }
// ---------------------------------------------------------------------------------//
// ex for toggle class function 
ToggleElementsClass(
    '#monitorMessageIcon' /* here is class name or id of icon or btn etc.., that on what ever action do someting
    remember for class: . , id: #  */,
    'click', /* string of action type like 'click' , 'drag' , 'mouseenter' etc...*/
    '.messagebox', /* classname of selected what ever class div , section , modal etc.... */
    'd-none' /* string of classname that you want togglet  */
)

// another example for toggle class function 
ToggleElementsClass('.bi-x-circle', 'click', '.messagebox', 'd-none')    