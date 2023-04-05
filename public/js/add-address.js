const addFormToCollection = (e) => {
    e.target.removeEventListener('click', addFormToCollection);
    e.target.style.display= "none";
    const collectionHolder = document.querySelector('.' + e.currentTarget.dataset.collectionHolderClass);
  
    const item = document.createElement('li');
  
    //Ajout d'une class au <li>
    item.classList.add("p-3", "mb-3");
 // On récupère le prototype
var newWidget = $(collectionHolder).attr('data-prototype');
// On remplace le __name__ du prototype par l'index du collectionHolder
newWidget = newWidget.replace(/__name__/g, collectionHolder.dataset.index);
// On ajoute le widget à la li
//L'appel en JQuery enclenche le CKEditor
var newElem = $(item).html(newWidget);

    // item.innerHTML = collectionHolder
    //   .dataset
    //   .prototype
    //   .replace(
    //     /__name__/g,
    //     collectionHolder.dataset.index
    //   );

    newElem.appendTo(collectionHolder);
    // collectionHolder.appendChild(item);
    addDelete();
    // item.querySelector('textarea').replace().CKEditor();
    collectionHolder.dataset.index++;
  };

  const addAddressFormDeleteLink = (item) => {
      const removeFormButton = document.createElement('a');
      removeFormButton.innerHTML = "<button class='btn btn-warning' title='Supprimer'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'><path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/><path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/></svg></button>";
  
      item.append(removeFormButton);
  
      removeFormButton.addEventListener('click', (e) => {
          e.preventDefault();
          // remove the li for the tag form
          item.remove();
          document.querySelector('#user_addAddress').style.display="block";
          document.querySelector('#user_addAddress').addEventListener("click", addFormToCollection)
      });
  }
  
  //Add
  document
    .querySelectorAll('.add_item_link')
    .forEach(btn => {
        btn.addEventListener("click", addFormToCollection)
    });
  
  //Remove
  function addDelete(){
    document
        .querySelectorAll('ul.addaddress li')
        .forEach((address) => {
            addAddressFormDeleteLink(address)
        })
  }