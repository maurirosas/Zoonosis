<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\AnimalForm;
use app\models\domain\entity\Animal;

class AnimalController extends Controller
{

    public function actionIndex()
    {
        $animal = Animal::getAll();

        return $this->render('index', [
            'animal' => $animal
        ]);
    }

    public function actionView($id_animal)
    {
        $animal = Animal::getById($id_animal);

        return $this->render('view', [
            'model' => $animal,
        ]);
    }

    public function actionCreate()
    {
        $form = new AnimalForm();

        if (Yii::$app->request->isPost) {
            if (
                $form->load(Yii::$app->request->post())
                && $form->validate()
                && $form->create()
            ) {
                Yii::$app->session->addFlash('success', 'Animal guardado');
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'model' => $form,
        ]);
    }

    public function actionUpdate($id_animal)
    {
        $animal = Animal::getById($id_animal);

        $form = new AnimalForm();
        $form->id_animal= $animal->id_animal;
        $form->nombre_animal = $animal->nombre_animal;
        $form ->genero = $animal->genero;
        $form ->zona_direccion = $animal->zona_direccion;
        $form ->tipo_dueno = $animal->tipo_dueno;
        $form ->edad = $animal->edad;
        $form ->especie = $animal->especie;

        if (Yii::$app->request->isPost) {
            if (
                $form->load(Yii::$app->request->post())
                && $form->validate()
                && $form->update()
            ) {
                Yii::$app->session->addFlash('success', 'Animal actualizado');
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
            'model' => $form,
        ]);
    }


    public function actionDelete($id_animal)
    {
        $animal = Animal::getById($id_animal);
        $animal->delete();
        return $this->redirect(['index']);
    }
}
