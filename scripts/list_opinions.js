function fetchOpinions(offset, limit) {
    fetch(`../database/get_opinion.php?offset=${offset}&is_visible=1&limit=${limit}`)
      .then(response => response.json())
      .then(data => {
        if (data.error) {
          console.error(data.error);
          return;
        }
  
        const opinionList = document.getElementById('opinion-list');
        opinionList.innerHTML = ''; // Vider la liste avant d'ajouter de nouveaux avis
  
        data.forEach(opinion => {
          const opinionItem = document.createElement('div');
          opinionItem.className = 'opinion-item mb-3';
          opinionItem.innerHTML = `
            <h5>${opinion.name_visitor}</h5>
            <p>${opinion.opinion}</p>
            <small>${new Date(opinion.createdAt).toLocaleString()}</small>
            <hr>
          `;
          opinionList.appendChild(opinionItem);
        });
  
        if (data.length < limit) {
          document.getElementById('load-more').style.display = 'none';
        } else {
          offset += limit;
        }
      })
      .catch(error => console.error('Erreur:', error));
  }
  
  document.addEventListener('DOMContentLoaded', function() {
    const limit = 3; // Nombre d'avis affichés initialement
    fetchOpinions(0, limit); // Récupérer les 3 premiers avis (offset 0)
  
    document.getElementById('load-more').addEventListener('click', function() {
      fetchOpinions(offset, limit); // Charger plus d'avis au clic
    });
  });
  