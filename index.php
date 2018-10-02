<?php require 'p2Logic.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Project 2</title>
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
          crossorigin="anonymous">

    <link href="p2.css" rel="stylesheet">
</head>

<body>
<div class='container'>
    <div>
        <h2 class="text-center">Event Registration</h2>
    </div>
    <form action='p2.php' method='GET'>
        <div class="form-group">
            <label class="control-label col-sm-2" for='firstName'>First Name</label>
            <div class="col-sm-10">
                <input type="text"
                       id='firstName'
                       class="form-control"
                       name="firstName"
                       value="<?= isset($results['firstName']) ? $results['firstName'] : '' ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for='lastName'>Last Name</label>
            <div class="col-sm-10">
                <input type="text"
                       class="form-control"
                       name="lastName"
                       value="<?= isset($results['lastName']) ? $results['lastName'] : '' ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for='trackName'>Pick Track</label>
            <div class="col-sm-10">
                <select name='trackName' class="form-control">
                    <option <?php if ($results['trackName'] == 'CSS') echo 'selected'; ?> value="CSS">CSS</option>
                    <option <?php if ($results['trackName'] == 'HTML') echo 'selected'; ?> value="HTML">HTML</option>
                    <option <?php if ($results['trackName'] == 'Javascript') echo 'selected'; ?> value="Javascript">Javascript</option>
                    <option <?php if ($results['trackName'] == 'PHP') echo 'selected'; ?> value="PHP">PHP</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for='guests'>Number of guests</label>
            <div class="col-sm-10">
                <input type="text"
                       class="form-control"
                       name="guests"
                       placeholder='$100 per person'
                       value="<?= isset($results['guests']) ? $results['guests'] : '0' ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                    <label><input type="checkbox"
                                  name="diet"
                                  value='restrict' <?php if ($results['diet'] == 'restrict') echo 'checked'; ?>
                                  Dietary
                                  Restrictions> </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Register</button>
            </div>
        </div>
    </form>
    <div id='results'>

        <?php if ($results['errors']) : ?>
            <div class='alert alert-danger'>
                <ul>
                    <?php foreach ($results['errors'] as $error) : ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php else: ?>
            <?php if ($results['cost']): ?>
                <h3>
                    <p> Thank you for registering <?= $results['firstName'] ?>. Your total cost for this event is
                        <mark>$<?= $results['cost'] ?></mark>
                    </p>
                </h3>
            <?php endif ?>
        <?php endif; ?>
    </div>
</div>
</body>
</html>