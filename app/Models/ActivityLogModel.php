<?php

namespace App\Models;

use CodeIgniter\Model;

class ActivityLogModel extends Model
{
    protected $table            = 'activity_logs';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'admin_id',
        'action',
        'description',
        'ip_address',
        'user_agent'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';

    protected $skipValidation       = true;
    protected $cleanValidationRules = true;

    /**
     * Registra uma atividade
     *
     * @param string $action
     * @param string|null $description
     * @param int|null $adminId
     * @return bool
     */
    public function log($action, $description = null, $adminId = null)
    {
        $request = \Config\Services::request();
        
        $data = [
            'admin_id' => $adminId ?? session()->get('admin_id'),
            'action' => $action,
            'description' => $description,
            'ip_address' => $request->getIPAddress(),
            'user_agent' => $request->getUserAgent()->getAgentString()
        ];
        
        return $this->insert($data);
    }

    /**
     * Busca logs de um administrador
     *
     * @param int $adminId
     * @param int $limit
     * @return array
     */
    public function getByAdmin($adminId, $limit = 50)
    {
        return $this->select('activity_logs.*, admins.name as admin_name')
                    ->join('admins', 'admins.id = activity_logs.admin_id', 'left')
                    ->where('activity_logs.admin_id', $adminId)
                    ->orderBy('activity_logs.created_at', 'DESC')
                    ->limit($limit)
                    ->findAll();
    }

    /**
     * Busca logs recentes
     *
     * @param int $limit
     * @return array
     */
    public function getRecent($limit = 50)
    {
        return $this->select('activity_logs.*, admins.name as admin_name, admins.email as admin_email')
                    ->join('admins', 'admins.id = activity_logs.admin_id', 'left')
                    ->orderBy('activity_logs.created_at', 'DESC')
                    ->limit($limit)
                    ->findAll();
    }

    /**
     * Busca logs por ação
     *
     * @param string $action
     * @param int $limit
     * @return array
     */
    public function getByAction($action, $limit = 50)
    {
        return $this->select('activity_logs.*, admins.name as admin_name')
                    ->join('admins', 'admins.id = activity_logs.admin_id', 'left')
                    ->where('activity_logs.action', $action)
                    ->orderBy('activity_logs.created_at', 'DESC')
                    ->limit($limit)
                    ->findAll();
    }

    /**
     * Busca logs por período
     *
     * @param string $startDate
     * @param string $endDate
     * @return array
     */
    public function getByDateRange($startDate, $endDate)
    {
        return $this->select('activity_logs.*, admins.name as admin_name')
                    ->join('admins', 'admins.id = activity_logs.admin_id', 'left')
                    ->where('activity_logs.created_at >=', $startDate)
                    ->where('activity_logs.created_at <=', $endDate)
                    ->orderBy('activity_logs.created_at', 'DESC')
                    ->findAll();
    }

    /**
     * Limpa logs antigos
     *
     * @param int $days Dias para manter
     * @return bool
     */
    public function cleanOldLogs($days = 90)
    {
        $date = date('Y-m-d H:i:s', strtotime("-{$days} days"));
        return $this->where('created_at <', $date)->delete();
    }

    /**
     * Estatísticas de atividades
     *
     * @param int $days
     * @return array
     */
    public function getStats($days = 30)
    {
        $date = date('Y-m-d H:i:s', strtotime("-{$days} days"));
        
        return [
            'total' => $this->where('created_at >=', $date)->countAllResults(false),
            'by_action' => $this->select('action, COUNT(*) as count')
                                ->where('created_at >=', $date)
                                ->groupBy('action')
                                ->orderBy('count', 'DESC')
                                ->findAll(),
            'by_admin' => $this->select('admins.name, COUNT(*) as count')
                               ->join('admins', 'admins.id = activity_logs.admin_id')
                               ->where('activity_logs.created_at >=', $date)
                               ->groupBy('activity_logs.admin_id')
                               ->orderBy('count', 'DESC')
                               ->findAll()
        ];
    }
}