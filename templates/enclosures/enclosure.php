<!-- Enclosure display template !-->
<div class="enclosure">
    <div class="enclosure-details">
        <span><strong>Nom :</strong> <?= $data['enclosure']['name'] ?></span>
        <span><strong>Description :</strong> <?= $data['enclosure']['description'] ?></span>
        <span><strong>Date de création :</strong> <?= $data['enclosure']['created_at'] ?></span>
    </div>
    <div class="enclosure-actions">
        <a href="/enclosure/update?id=<?= $data['enclosure']['id'] ?>" class="edit"><button type="button" class="edit">Modifier</button></a>
        <form class="deleteEnclosure" id="form-<?= $data['enclosure']['id'] ?>" action="/enclosure/delete" method="POST">
            <input type="hidden" name="id" value="<?= $data['enclosure']['id'] ?>">
            <button type="submit" class="delete">Suprimer</button>
        </form>
    </div>
</div>