
function newRange(name, max) {
  const rangeInput = document.getElementById('range-' + name)

  if (rangeInput) {
    rangeInput.defaultValue = max;
    newRangeLabel(name, rangeInput)
    rangeInput.addEventListener("mousemove", () => newRangeLabel(name, rangeInput))
  }
}

function newRangeLabel(name, input) {
  const rangeLabel = document.getElementById('range_label-' + name)
  if (rangeLabel) {
    rangeLabel.innerHTML = (name == 'price' ? '$' : '') + input.value.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
  } else {
    input.removeEventListener("mousemove")
  }
  return
}

newRange('price', 10000)
newRange('mileage', 1000000)
