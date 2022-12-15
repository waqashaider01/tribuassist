/// <reference types="react" />
import { ToolbarItemConfig } from '../../../config/default-config';
export interface MenubarItemProps {
    item: ToolbarItemConfig;
}
export declare function ToolbarItem({ item }: MenubarItemProps): JSX.Element | null;
