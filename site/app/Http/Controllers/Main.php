<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Tree;

class Main extends Controller
{
    private function getTree($startDir, $path) {
        $data = [];

        foreach (Tree::where('parent', $startDir)->cursor() as $item) {
            if ($item['type'] == 'dir') {
                $children = $this->getTree($item['id'], $path . '/' . $item['name']);

                if (count($children)) {
                    $item['children'] = $children;
                }
            }

            $item['path'] = $path . '/' . $item['name'];

            array_push($data, $item);

        }

        return $data;
    }

    public function user($id) {
        $startPathId = $id;

        $data = Tree::where('id', $startPathId)->get();

        if (count($data)) {
            $data = $data[0];
            $data['children'] = $this->getTree($startPathId, '/' . $data['name']);
            $data['path'] = '/' . $data['name'];
            $data['data'] = true;
        } else {
            $data = array('data' => false);
        }

        return $data;
    }

    public function addTask(Request $request) {
        $ids = $request->all()['fileIds'];

        Tree::where('type', 'file')->whereIn('id', $ids)
                ->update(['in_process' => true]);
        
        return 1;
    }
}