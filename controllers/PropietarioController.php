<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\PropietarioForm;
use app\models\domain\entity\Propietario;

class PropietarioController extends Controller
{

    public function actionIndex()
    {
        $propietario = Propietario::getAll();

        return $this->render('index', [
            'propietario' => $propietario
        ]);
    }

    public function actionView($id)
    {
        $propietario = Propietario::getById($id);

        return $this->render('view', [
            'model' => $propietario,
        ]);
    }

    public function actionCreate()
    {
        $form = new PropietarioForm();

        if (Yii::$app->request->isPost) {
            if (
                $form->load(Yii::$app->request->post())
                && $form->validate()
                && $form->create()
            ) {
                Yii::$app->session->addFlash('success', 'Propietario guardado');
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'model' => $form,
        ]);
    }

    public function actionUpdate($id)
    {
        $propietario = Propietario::getById($id);

        $form = new PropietarioForm();
        $form->id = $propietario->id;
        $form->celular = $propietario->celular ;
        $form ->direccion = $propietario->direccion;
        $form ->tipo_dueno = $propietario->tipo_dueno;
        $form ->nombre = $propietario->nombre;
        $form ->apellidos = $propietario->apellidos;

        if (Yii::$app->request->isPost) {
            if (
                $form->load(Yii::$app->request->post())
                && $form->validate()
                && $form->update()
            ) {
                Yii::$app->session->addFlash('success', 'Propietario actualizado');
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
            'model' => $form,
        ]);
    }


    public function actionDelete($id)
    {
        $propietario = Propietario::getById($id);
        $propietario->delete();
        return $this->redirect(['index']);
    }
}
