<?
# lists files existing in folder A but not in foler B
# To be compiled against php 4.4.4
# http://www.bambalam.se/bamcompile/

if(isset($argv[1])) { $folder_a=$argv[1]; } else { error("First argument must be folder A");	}
if(isset($argv[2])) { $folder_b=$argv[2]; } else { error("Second argument must be folder B");	}

if(!is_dir($folder_a))	{ error("First argument must be folder A");	}
if(!is_dir($folder_b))	{ error("Second argument must be folder B");	}

# -----------

echo "\n\nGetting list of files in [$folder_a]\n";
$list_a = get_files($folder_a);
#print_r($list_a);

echo "\n\nGetting list of files in [$folder_b]\n";
$list_b = get_files($folder_b);
#print_r($list_b);

echo "\n\nListing files in [$folder_a] but not in [$folder_b]\n";
foreach($list_a as $hash => $path)
{
	if(!isset($list_b[$hash]))
	{
		echo "$path\n";
	}
}

# -----------

function get_files($dir, $files=array())
{
	echo "\n$dir/";
	$paths = glob("$dir/*");
	foreach($paths as $file)
	{
		if(is_dir($file))
		{
			$files = get_files($file, $files);
		}
		else
		{
			$hash = sha1_file($file);
			if(!$hash)
			{
				echo "\nWARNING: Cannot hash [$file]\n$dir/";
			}
			elseif(isset($files[$hash]))
			{
				echo "\nWARNING: [$file] is a duplicate of [".$files[$hash]."]\n$dir/";
				$files[$hash] .= ", $file";
			}
			else
			{
				$files[$hash] = $file;
				echo ".";
			}
		}
	}
	return $files;
}

function error($message)
{
	echo "Error: $message" . "\n";
	echo "Usage:" . "\n";
	echo "\n";
	echo '    \path\to\compare-directoryies.exe \path\to\small\folder \path\to\big\folder' . "\n";
	echo "\n";
	exit(1);
}
