<div class="lobby-container" id="vue-app">
  <ul>
    <li class="name">
      <i class="fas fa-search"></i>
      <input type="search" class="search" placeholder="Entrez le nom d'un vin...">
    </li>

    <li class="country">
      <i class="fas fa-globe-europe"></i>
    </li>

    <li class="grapes">
      <i class="fas fa-wine-glass-alt"></i>
    </li>
  </ul>
  <div class="list-container">
    <div v-for="wine, id in wines" :key='id' class="wine-list">
      <div class="wine-card">
        <div class="card-header">
          <h2> {{wine.name}} </h2>
          <i class="fas fa-times" @click="removeItem(id)"></i>
        </div>
      </div>
    </div>
  </div>
</div>