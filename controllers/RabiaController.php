<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\RabiaForm;
use app\models\domain\entity\Rabia;

class RabiaController extends Controller
{

    public function actionIndex()
    {
        $rabia = Rabia::getAll();

        return $this->render('index', [
            'rabia' => $rabia
        ]);
    }

    public function actionView($id)
    {
        $rabia = Rabia::getById($id);

        return $this->render('view', [
            'model' => $rabia,
        ]);
    }

    public function actionCreate()
    {
        $form = new RabiaForm();

        if (Yii::$app->request->isPost) {
            if (
                $form->load(Yii::$app->request->post())
                && $form->validate()
                && $form->create()
            ) {
                Yii::$app->session->addFlash('success', 'rabia guardado');
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'model' => $form,
        ]);
    }

    public function actionUpdate($id)
    {
        $rabia = Rabia::getById($id);

        $form = new RabiaForm();
        $form->id = $rabia->id;
        $form->municipio = $rabia->municipio;
        $form ->area = $rabia->area;
        $form ->fecha = $rabia->fecha_registro;
        $form ->json = $rabia->json;
        $form ->id_dueno = $rabia->id_dueno;
        $form ->id_animal = $rabia->id_animal;

        if (Yii::$app->request->isPost) {
            if (
                $form->load(Yii::$app->request->post())
                && $form->validate()
                && $form->update()
            ) {
                Yii::$app->session->addFlash('success', 'Registro actualizado');
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
            'model' => $form,
        ]);
    }


    public function actionDelete($id)
    {
        $rabia = Rabia::getById($id);
        $rabia->delete();
        return $this->redirect(['index']);
    }
}
