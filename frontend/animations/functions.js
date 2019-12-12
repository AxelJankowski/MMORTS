let army = document.getElementById("army");
let keep = document.getElementById('keep-panel');
let tavern = document.getElementById('tavern-panel');

function openBuildPanel(panel) {
    if (window.getComputedStyle(panel).display === 'none') {
        army.style.display = 'none';
        keep.style.display = 'none';
        tavern.style.display = 'none';
        panel.style.display = 'block';
    } else {
        //some animation showing that windows already switched
    }
}

function closeBuildPanel(panel) {
    if (window.getComputedStyle(army).display === 'none' && window.getComputedStyle(panel).display === 'block') {
        army.style.display = 'block';
        panel.style.display = 'none';
    }
}