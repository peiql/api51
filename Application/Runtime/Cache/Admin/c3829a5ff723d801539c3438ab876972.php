<?php if (!defined('THINK_PATH')) exit(); if(is_array($ulist)): foreach($ulist as $key=>$v): ?><tr>
            	<td class="num"><?php echo ($v["user_id"]); ?></td>
                <td class="name"><?php echo ($v["user_name"]); ?></td>
                <td class="nickname"><?php echo ($v["user_nickname"]); ?></td>
                <td class="dept"><?php echo ($v["dept_name"]); ?></td>
                <td class="sex"><?php echo ($v["user_sex"]); ?></td>
                <td class="birthday"><?php echo ($v["user_birthday"]); ?></td>
                <td class="tel"><?php echo ($v["user_tel"]); ?></td>
                <td class="email"><?php echo ($v["user_email"]); ?></td>
                <td class="ctime"><?php echo ($v["user_ctime"]); ?></td>
                <td class="operate">操作</td>
            </tr><?php endforeach; endif; ?>