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

  const addCategoryFormDeleteLink = (item) => {
      const removeFormButton = document.createElement('a');
      removeFormButton.innerHTML = "<button class='btn btn-warning' title='Supprimer'><i class='bi bi-trash'></i></button>";
      item.append(removeFormButton);
  
      removeFormButton.addEventListener('click', (e) => {
          e.preventDefault();
          // remove the li for the tag form
          item.remove();
          document.querySelector('#product_addCategory').style.display="block";
          document.querySelector('#product_addCategory').addEventListener("click", addFormToCollection)
      });
  }
  
  //Add (ajout)
  document
    .querySelectorAll('.add_item_link')
    .forEach(btn => {
        btn.addEventListener("click", addFormToCollection)
    });
  
  //Remove (suppression)
  function addDelete(){
    document
        .querySelectorAll('ul.addcategory li')
        .forEach((category) => {
            addCategoryFormDeleteLink(category)
        })
  }