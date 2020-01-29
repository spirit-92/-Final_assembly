<?php


namespace App\helpers;

use App\model\BaseReader;
use Illuminate\Http\Request;

class BaseReaderHelpers
{
    public static function storeBaseReaderR(Request $request)
    {
        $checkRepeat = BaseReader::where('id_reader', $request->reader)->where('id_book', $request->book)->count();
        if ($checkRepeat) {
            BaseReader::where('id_reader', $request->reader)->where('id_book', $request->book)->update(['id_rate' => $request->rate]);
            return 'удачно обновил рейтинг прочитайно книги';
        } else {
            $saveBaseReader = new BaseReader([
                'id_reader' => $request->reader,
                'id_book' => $request->book,
                'id_rate' => $request->rate
            ]);
            $saveBaseReader->save();
            return 'удачно добавил читателя который прочитал книгу';
        }
    }
}
