<?php

namespace yii2bundle\telegram\domain\services;

use yii2bundle\telegram\domain\entities\UserAssignmentEntity;
use yii2bundle\telegram\domain\entities\UserEntity;
use yii2bundle\telegram\domain\interfaces\services\UserAssignmentInterface;
use yii\web\NotFoundHttpException;
use yii2rails\domain\data\Query;
use yii2rails\domain\services\base\BaseActiveService;

/**
 * Class UserAssignmentService
 * 
 * @package yii2bundle\telegram\domain\services
 * 
 * @property-read \yii2bundle\telegram\domain\Domain $domain
 * @property-read \yii2bundle\telegram\domain\interfaces\repositories\UserAssignmentInterface $repository
 */
class UserAssignmentService extends BaseActiveService implements UserAssignmentInterface {

    public function detach($userId, $roleName) {
        $assignmentEntity = $this->repository->oneByParams($userId, $roleName);
        $this->repository->delete($assignmentEntity);
    }

    public function add($userId, $roleName) {
        try {
            $assignmentEntity = $this->repository->oneByParams($userId, $roleName);
        } catch (NotFoundHttpException $e) {
            $assignmentEntity = new UserAssignmentEntity;
            $assignmentEntity->user_id = $userId;
            $assignmentEntity->role_name = $roleName;
            $this->repository->insert($assignmentEntity);
            $assignmentEntity = $this->repository->oneByParams($userId, $roleName);
        }
        return $assignmentEntity;
    }

}
