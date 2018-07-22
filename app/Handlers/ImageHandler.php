<?php
/**
 * Created by PhpStorm.
 * User: hattie
 * Date: 2018/7/22
 * Time: 下午6:05
 */

namespace App\Handlers;


use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;
use Webpatser\Uuid\Uuid;

class ImageHandler
{
	protected static $allowImageType = ['png', 'jpeg', 'gif'];

	/**
	 * 图片上传
	 *
	 * @param UploadedFile $file
	 * @param $folder
	 * @param $prefix
	 * @param bool $maxWidth
	 *
	 * @return array|bool
	 * @throws \Exception
	 */
	public function upload(UploadedFile $file, $folder, $prefix, $maxWidth = false)
	{
		$folder = 'uploads/images/' . $folder . '/' . date('Ym/d');

		$ext = strtolower($file->getClientOriginalExtension()) ?? 'png';
		$filename = $prefix. '-'. (string)Uuid::generate(4).'.'.$ext;

		if (!in_array($ext, self::$allowImageType, true)) {
			return false;
		}

		$file->move($folder, $filename);

		if ($maxWidth && $ext != 'gif') {
			$this->reduceSize("{$folder}/{$filename}", $maxWidth);
		}

		return [
			'path' => "/{$folder}/{$filename}"
		];
	}

	/**
	 * 图片缩小
	 *
	 * @param $file
	 * @param $width
	 */
	public function reduceSize($file, $width)
	{
		$image = Image::make($file);
		$image->resize($width, null, function ($constraint) {
			$constraint->aspectRatio();
			$constraint->upsize();
		});

		$image->save();
	}
}