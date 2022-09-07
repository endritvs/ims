let stars = [] //array to hold stars
function star(event) {
  let icons = document.querySelectorAll('.star') // grab all icons
  let idx = Array.from(icons).indexOf(event.target) // get index of selected icon
  if (stars.includes(event.target.id)) { // if selected icon is in array of stars
    stars.splice(idx, stars.length ) // remove that icon and all following icons fro array
    for (let i = idx; i <= icons.length - 1; i++) { // loop thru all icons and set class and color
      icons[i].className = "fa fa-star-o star";
      icons[i].style.color = "black";
    }
  } else { // if selected icon is not in array of stars
    stars = [] // clear array
    for (let i = 0; i <= idx; i++) { // loop thru all icons and set class and color
      stars.push(icons[i].id) // add icon to array of stars
      icons[i].className = "fa fa-star star";
      icons[i].style.color = "gold";
    }
  }
}