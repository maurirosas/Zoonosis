<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\EsterilizacionForm;
use app\models\domain\entity\Esterilizacion;

class EsterilizacionController extends Controller
{

    public function actionIndex()
    {
        $esterilizacion = Esterilizacion::getAll();

        return $this->render('index', [
            'productos' => $esterilizacion
        ]);
    }

    public function actionView($id)
    {
        $esterilizacion = Esterilizacion::getById($id);

        return $this->render('view', [
            'model' => $esterilizacion,
        ]);
    }

    public function actionCreate()
    {
        $form = new EsterilizacionForm();

        if (Yii::$app->request->isPost) {
            if (
                $form->load(Yii::$app->request->post())
                && $form->validate()
                && $form->create()
            ) {
                Yii::$app->session->addFlash('success', 'Producto guardado');
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'model' => $form,
        ]);
    }

    public function actionUpdate($id)
    {
        $esterilizacion = Esterilizacion::getById($id);

        $form = new EsterilizacionForm();
        $form->id = $producto->id;
        $form->nombre = $producto->nombre;

        if (Yii::$app->request->isPost) {
            if (
                $form->load(Yii::$app->request->post())
                && $form->validate()
                && $form->update()
            ) {
                Yii::$app->session->addFlash('success', 'Producto actualizado');
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
            'model' => $form,
        ]);
    }


    public function actionDelete($id)
    {
        $producto = Producto::getById($id);
        $producto->delete();
        return $this->redirect(['index']);
    }
}
