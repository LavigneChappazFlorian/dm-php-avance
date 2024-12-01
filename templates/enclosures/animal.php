<!-- Animal display template !-->
<div class="animal">
    <div class="animal-details">
        <span><strong>Nom :</strong> <?= $data['animal']['name'] ?></span>
        <span><strong>Description :</strong> <?= $data['animal']['description'] ?></span>
        <span><strong>Espèce :</strong> <?= $data['animal']['specie'] ?></span>
        <span><strong>Date de création :</strong> <?= $data['animal']['created_at'] ?></span>
        <span><strong>Enclos de l'animal :</strong> <?= $data['enclosure']['name'] ?></span>
    </div>
    <div class="animal-actions">
        <a href="/animal/update?id=<?= $data['animal']['id'] ?>" class="edit"><button type="button" class="edit">Modifier</button></a>
        <form class="deleteAnimal" id="form-<?= $data['animal']['id'] ?>" action="/animal/delete" method="POST">
            <input type="hidden" name="id" value="<?= $data['animal']['id'] ?>">
            <button type="submit" class="delete">Suprimer</button>
        </form>
    </div>
</div>