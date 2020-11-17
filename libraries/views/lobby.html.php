<div class="lobby-container" id="vue-app">
  <ul>
    <li @click="searchInput('name')" class="name">
      <i class="fas fa-search"></i>
      <input v-if="inputType=='name'" v-model="searchKey" type="search" class="search" placeholder="Entrez le nom d'un vin...">
    </li>

    <li @click="searchInput('contry')" class="country">
      <i class="fas fa-globe-europe"></i>
      <select v-show="inputType=='contry'" v-model="countrySelected">
        <option value="">Choisissez un pays</option>
        <option v-for="option in contryOption" :value="option.id"> {{option.name}} </option>
      </select>
    </li>

    <li @click="searchInput('grapes')" class="grapes">
      <i class="fas fa-wine-glass-alt"></i>
      <div v-if="inputType == 'grapes'" class="radio-container">
        <div v-for="grape in grapesRadio" class="radio">
          <label :for="grape.name"> {{grape.name}} </label>
          <input v-model="grapesSelected" :id="grape.name" :value="grape.name" type="radio" class="radio-button">
        </div>
      </div>
    </li>
  </ul>
  <h1 v-if="inputType==''" class="title">Liste des vins</h1>
  <h3 v-if="search.length == 0">Aucun résultat</h3>

  <div class="list-container">
    <div v-for="wine, id in search" :key='id' class="wine-list">
      <div class="wine-card">
        <div class="card-header">
          <h2> {{wine.name}} </h2>
          <i class="fas fa-times" @click="removeItem(id)"></i>
        </div>
        <div class="container">
          <div class="text-container">
            <div class="buttons">
              <h4> {{wine.year}} </h4>
              <h4> {{wine.country}} </h4>
              <h4> {{wine.grapes}} </h4>
            </div>
            <div class="location">
              <i class="fas fa-map-marker-alt"></i>
              <span> {{wine.region}} </span>
            </div>
            <p> {{wine.description}} </p>
          </div>
          <img :src="getImgUrl(wine.picture)" alt="photo-bouteille">
        </div>
      </div>
    </div>
  </div>
</div>