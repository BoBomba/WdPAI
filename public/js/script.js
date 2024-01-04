const dogs = document.querySelectorAll(".dog-container");

console.log(dogs);

function removeDog(dog)
{
    const name = dog.querySelector("p");
    console.log(name.textContent);
    alert("ok");
}

dogs.forEach(dog => dog.addEventListener("click", () => removeDog(dog)))
